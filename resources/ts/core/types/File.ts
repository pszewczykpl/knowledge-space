import {FileCategory} from "@/core/types/FileCategory";
import {User} from "@/core/types/User";

export interface File {
    id: number;
    name: string;
    code: string | null;
    path: string;
    extension: string;
    draft: number;
    type: string;
    file_category: FileCategory;
    created_by?: User | null;
    created_at: Date;
    updated_at?: Date | null;
}
