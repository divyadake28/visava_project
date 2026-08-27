export interface Activity {
  id: number;
  title: string;
  title_mr?: string;
  title_en?: string;
  short_description?: string;
  short_description_mr?: string;
  short_description_en?: string;
  description?: string;
  description_mr?: string;
  description_en?: string;
  image?: string;
  icon?: string;
  sort_order: number;
  is_active: boolean;
  created_at?: string;
}