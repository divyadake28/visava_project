export interface GalleryItem {
  id: number;
  title?: string;
  title_mr?: string;
  title_en?: string;
  category?: string;
  category_mr?: string;
  category_en?: string;
  image: string;
  sort_order?: number;
  status: string;
  created_at?: string;
}