import {User} from "@/core/types/User";

export interface Comment {
    id: number;
    content: string;
    created_by?: User | null;
    created_at: Date;
    updated_at?: Date | null;
}
