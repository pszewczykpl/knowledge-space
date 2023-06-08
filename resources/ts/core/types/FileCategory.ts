import {User} from "@/core/types/User";

export interface FileCategory {
    id: number;
    name: string;
    prefix?: string;
    created_by?: User | null;
    created_at: Date;
    updated_at?: Date | null;
}
