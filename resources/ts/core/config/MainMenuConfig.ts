import {isAdmin} from "@/core/services/AuthService";

interface Page {
    heading: string;
    route: string;
}

interface MainMenuItem {
    pages: Page[];
    heading?: string;
}

interface MainMenuConfig extends Array<MainMenuItem> {}

const MainMenuConfig: MainMenuConfig = [
    {
        pages: [
            {
                heading: "Strona główna",
                route: "/home"
            },
            {
                heading: "Archiwum produktowe",
                route: "/products"
            },
            {
                heading: "Fundusze",
                route: "/funds"
            },
            {
                heading: "Linki",
                route: "/links"
            }
        ],
    },
    {
        heading: 'Administracja',
        pages: [
            {
                heading: "Kategorie dokumentów",
                route: "/file-categories"
            }
        ],
    },
];

export default MainMenuConfig;