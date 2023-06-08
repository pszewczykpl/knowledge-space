import {User} from "@/core/types/User";

export interface Link {
    id: number;
    name: string;
    url: string;
    description?: string | null;
    created_by?: User | null;
    created_at: Date;
    updated_at?: Date | null;
}
