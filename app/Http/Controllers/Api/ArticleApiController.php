<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleApiController extends Controller
{
    /**
     * CORS headers for cross-origin requests
     */
    protected array $corsHeaders = [
        'Access-Control-Allow-Origin' => '*',
        'Access-Control-Allow-Methods' => 'GET, OPTIONS',
        'Access-Control-Allow-Headers' => 'Content-Type, Authorization, X-Requested-With, Accept',
    ];

    /**
     * Display a listing of articles with filtering, searching, and pagination.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $limit = (int) $request->input('limit', $request->input('per_page', 10));
        $limit = max(1, min($limit, 100)); // Batas antara 1 - 100 per halaman

        $query = Article::query()
            ->leftJoin('categories', 'articles.category_id', '=', 'categories.id')
            ->select(
                'articles.id',
                'articles.title',
                'articles.author',
                'articles.date',
                'articles.description',
                'articles.images',
                'articles.category_id',
                'articles.major_id',
                'articles.is_selected',
                'articles.created_at',
                'articles.updated_at',
                'categories.name as category_name'
            );

        // Filter berdasarkan kategori (bisa ID atau nama kategori)
        if ($request->filled('category')) {
            $cat = $request->input('category');
            if (is_numeric($cat)) {
                $query->where('articles.category_id', $cat);
            } else {
                $query->where('categories.name', 'LIKE', '%' . $cat . '%');
            }
        }

        // Filter kategori ID spesifik
        if ($request->filled('category_id')) {
            $query->where('articles.category_id', $request->input('category_id'));
        }

        // Filter artikel unggulan (featured / is_selected)
        if ($request->has('featured') || $request->has('is_selected')) {
            $featured = $request->boolean('featured', $request->boolean('is_selected'));
            $query->where('articles.is_selected', $featured ? 1 : 0);
        }

        // Pencarian berdasarkan judul atau isi
        if ($request->filled('search') || $request->filled('q')) {
            $search = $request->input('search', $request->input('q'));
            $query->where(function ($q) use ($search) {
                $q->where('articles.title', 'LIKE', '%' . $search . '%')
                  ->orWhere('articles.description', 'LIKE', '%' . $search . '%')
                  ->orWhere('articles.author', 'LIKE', '%' . $search . '%');
            });
        }

        // Pengurutan
        $order = strtolower($request->input('order', 'desc')) === 'asc' ? 'asc' : 'desc';
        $sortBy = in_array($request->input('sort'), ['date', 'title', 'id']) ? $request->input('sort') : 'created_at';
        $query->orderBy('articles.' . $sortBy, $order);

        $paginated = $query->paginate($limit);

        // Format data
        $items = collect($paginated->items())->map(function ($article) {
            return $this->formatArticle($article);
        });

        return response()->json([
            'status' => 'success',
            'message' => 'Articles retrieved successfully',
            'pagination' => [
                'total' => $paginated->total(),
                'per_page' => $paginated->perPage(),
                'current_page' => $paginated->currentPage(),
                'last_page' => $paginated->lastPage(),
                'has_more' => $paginated->hasMorePages(),
                'next_page_url' => $paginated->nextPageUrl(),
                'prev_page_url' => $paginated->previousPageUrl(),
            ],
            'data' => $items,
        ], 200, $this->corsHeaders);
    }

    /**
     * Display the specified article by ID.
     *
     * @param int|string $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $article = Article::query()
            ->leftJoin('categories', 'articles.category_id', '=', 'categories.id')
            ->select(
                'articles.id',
                'articles.title',
                'articles.author',
                'articles.date',
                'articles.description',
                'articles.images',
                'articles.category_id',
                'articles.major_id',
                'articles.is_selected',
                'articles.created_at',
                'articles.updated_at',
                'categories.name as category_name'
            )
            ->where('articles.id', $id)
            ->first();

        if (!$article) {
            return response()->json([
                'status' => 'error',
                'message' => 'Article not found',
                'data' => null,
            ], 404, $this->corsHeaders);
        }

        // Ambil 4 artikel terkait
        $related = Article::query()
            ->leftJoin('categories', 'articles.category_id', '=', 'categories.id')
            ->select(
                'articles.id',
                'articles.title',
                'articles.author',
                'articles.date',
                'articles.description',
                'articles.images',
                'articles.category_id',
                'articles.is_selected',
                'articles.created_at',
                'categories.name as category_name'
            )
            ->where('articles.id', '!=', $article->id)
            ->when($article->category_id, function ($q) use ($article) {
                $q->where('articles.category_id', $article->category_id);
            })
            ->orderBy('articles.created_at', 'desc')
            ->limit(4)
            ->get()
            ->map(function ($item) {
                return $this->formatArticle($item);
            });

        $data = $this->formatArticle($article, true);
        $data['related_articles'] = $related;

        return response()->json([
            'status' => 'success',
            'message' => 'Article detail retrieved successfully',
            'data' => $data,
        ], 200, $this->corsHeaders);
    }

    /**
     * Display a listing of categories with their article counts.
     *
     * @return JsonResponse
     */
    public function categories(): JsonResponse
    {
        $categories = Category::withCount('articles')
            ->orderBy('name', 'asc')
            ->get(['id', 'name'])
            ->map(function ($cat) {
                return [
                    'id' => $cat->id,
                    'name' => $cat->name,
                    'total_articles' => $cat->articles_count ?? 0,
                ];
            });

        return response()->json([
            'status' => 'success',
            'message' => 'Categories retrieved successfully',
            'count' => $categories->count(),
            'data' => $categories,
        ], 200, $this->corsHeaders);
    }

    /**
     * Helper to format article output
     *
     * @param object $article
     * @param bool $isDetail
     * @return array
     */
    protected function formatArticle(object $article, bool $isDetail = false): array
    {
        $cleanDesc = trim(preg_replace('/\s+/', ' ', strip_tags($article->description ?? '')));
        $imageUrl = !empty($article->images) 
            ? url('storage/images/' . $article->images) 
            : url('logo.png');

        $result = [
            'id' => (int) $article->id,
            'title' => $article->title,
            'slug' => Str::slug($article->title),
            'author' => $article->author,
            'date' => $article->date,
            'excerpt' => Str::limit($cleanDesc, 160),
            'category' => [
                'id' => $article->category_id ? (int) $article->category_id : null,
                'name' => $article->category_name ?? null,
            ],
            'is_featured' => (bool) ($article->is_selected ?? false),
            'image' => [
                'file_name' => $article->images ?? null,
                'url' => $imageUrl,
            ],
            'web_url' => url('/artikel/' . $article->id),
            'created_at' => $article->created_at,
            'updated_at' => $article->updated_at ?? null,
        ];

        // Jika halaman detail, sertakan isi penuh
        if ($isDetail) {
            $result['content'] = $article->description;
        }

        return $result;
    }
}
