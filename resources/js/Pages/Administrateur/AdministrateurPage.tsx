import React, { useState } from "react";
// import { FaEdit, FaTrashAlt } from "react-icons/fa"; // Icônes
import { Inertia } from "@inertiajs/inertia";

import { Head, usePage } from "@inertiajs/inertia-react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";

const AdministrateurList = () => {
    // const { administrateurs } = usePage().props;

    // const [isCreateModalOpen, setCreateModalOpen] = useState(false);
    // const [isUpdateModalOpen, setUpdateModalOpen] = useState(false);
    const [isDeleteModalOpen, setDeleteModalOpen] = useState(false);
    const [isSuccessModalOpen, setSuccessModalOpen] = useState(false);
    const [selectedAdmin, setSelectedAdmin] = useState<any>(null);

    const handleDelete = (admin: any) => {
        setSelectedAdmin(admin);
        setDeleteModalOpen(true);
    };

    const handleDeleteConfirmation = () => {
        if (selectedAdmin) {
            Inertia.delete(route("administrateur.delete", selectedAdmin.id), {
                onSuccess: () => {
                    setSuccessModalOpen(true);
                    setDeleteModalOpen(false);
                },
                onError: () => {
                    setSuccessModalOpen(false);
                    setDeleteModalOpen(false);
                },
            });
        }
    };

    return (
        <AuthenticatedLayout
            header={
                <div>
                    <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                        Departement
                    </h2>
                    {/* Bouton pour ajouter un nouveau département */}
                    <button
                        // onClick={handleCreateDepartment}
                        className="mb-4 p-2 bg-blue-500 text-white rounded-md"
                    >
                        Ajouter un département
                    </button>
                </div>
            }
        >
            <Head title="Departement" />

            
        </AuthenticatedLayout>
    );
};

export default AdministrateurList;
