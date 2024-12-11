import { PageProps } from "@/types";
import { Layout } from "@/Components/layout";
import { Hero, HeroIllustration } from "@/Components/hero";
import "../../css/styles.css";
import { Config } from "../../../vendor/tightenco/ziggy/src/js";

export default function Welcome({
    auth,
}: PageProps<{
    laravelVersion: string;
    phpVersion: string;
    className?: string;
}>) {
    const handleImageError = () => {
        document
            .getElementById("screenshot-container")
            ?.classList.add("!hidden");
        document.getElementById("docs-card")?.classList.add("!row-span-1");
        document
            .getElementById("docs-card-content")
            ?.classList.add("!flex-row");
        document.getElementById("background")?.classList.add("!hidden");
    };
   
    return (
        <Layout>
            <Hero
                auth={auth}
                title="Système d'Automatisation de la Gestion des Documents Universitaires "
                content="Création et génération automatisée des documents.
                Archivage et accès sécurisé .
                Suivi et vérification .
                "
                illustration={<HeroIllustration />}
            />
        </Layout>
    );
}
