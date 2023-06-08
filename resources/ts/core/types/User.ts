export interface User {
    id: number;
    first_name: string;
    last_name: string;
    email: string;
    phone?: string | null;
    position?: string | null;
    description?: string | null;
    avatar_path?: string | null;
    created_at: Date;
    updated_at?: Date | null;
}
