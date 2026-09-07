export interface DiningItem {
  id: number;
  title: string;
  title_mr?: string;
  title_en?: string;
  badge?: string;
  badge_mr?: string;
  badge_en?: string;
  badge_icon?: string;
  category?: string;
  category_mr?: string;
  category_en?: string;
  short_description?: string;
  short_description_mr?: string;
  short_description_en?: string;
  image?: string;
  dietary_type?: string;
  sort_order: number;
  status: string;
  created_at?: string;
}
