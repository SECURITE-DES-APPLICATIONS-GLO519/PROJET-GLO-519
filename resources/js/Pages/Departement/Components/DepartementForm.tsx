import { Department } from "@/types";
import { Inertia } from "@inertiajs/inertia";
import { enqueueSnackbar } from "notistack";
import React, { useState, useEffect } from "react";

interface DepartmentFormProps {
    department?: Department;
    onSubmit: (department: Department) => void;
}

const DepartmentForm: React.FC<DepartmentFormProps> = ({
    department,
    onSubmit,
}) => {
    const [formData, setFormData] = useState<Department>({
        id: department?.id || "",
        code: department?.code || "",
        nom: department?.nom || "",
        description: department?.description || "",
    });

    const handleChange = (
        e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>
    ) => {
        const { name, value } = e.target;
        setFormData({ ...formData, [name]: value });
    };

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        onSubmit(formData);

        if (formData.id) {
            Inertia.put(route("departement.update_", formData.id), formData, {
                onSuccess: () => {
                    debugger;
                    enqueueSnackbar("Département mis à jour avec succès!", {
                        variant: "success",
                    });
                },
                onError: (errors) => {
                    debugger;
                    enqueueSnackbar(
                        "Erreur lors de la mise à jour du département.",
                        { variant: "error" }
                    );
                },
            });
        } else {
            Inertia.post(route("departement.create_"), formData, {
                onSuccess: () => {
                    debugger;
                    enqueueSnackbar("Département créé avec succès!", {
                        variant: "success",
                    });
                },
                onError: (errors) => {
                    debugger;
                    enqueueSnackbar(
                        "Erreur lors de la création du département.",
                        { variant: "error" }
                    );
                },
            });
        }
    };

    return (
        <form onSubmit={handleSubmit} className="department-form">
            <label>Nom :</label>
            <input
                type="text"
                name="nom"
                value={formData.nom}
                onChange={handleChange}
                required
            />

            <label>Code :</label>
            <input
                type="text"
                name="code"
                value={formData.code}
                onChange={handleChange}
                required
            />

            <label>Description :</label>
            <textarea
                name="description"
                value={formData.description}
                onChange={handleChange}
            />

            <button type="submit">
                {department ? "Modifier" : "Créer"} Département
            </button>
        </form>
    );
};

export default DepartmentForm;
