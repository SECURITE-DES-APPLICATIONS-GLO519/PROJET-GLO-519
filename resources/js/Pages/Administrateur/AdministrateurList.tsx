import React, { useState } from "react";
import { Inertia } from "@inertiajs/inertia";
// import { FaEdit, FaTrashAlt } from "react-icons/fa"; // Icônes

import { usePage } from "@inertiajs/inertia-react";
import Modal from "@/Components/Modal";

const AdministrateurList = () => {
    const { administrateurs } = usePage().props;

    const [isCreateModalOpen, setCreateModalOpen] = useState(false);
    const [isUpdateModalOpen, setUpdateModalOpen] = useState(false);
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
        <div>
            <h1 className="text-3xl font-bold mb-4">
                Liste des Administrateurs
            </h1>

            <button
                className="mb-4 px-4 py-2 bg-blue-600 text-white rounded"
                onClick={() => setCreateModalOpen(true)}
            >
                Créer un administrateur
            </button>

            <table className="min-w-full table-auto">
                <thead>
                    <tr>
                        <th className="px-4 py-2">Nom</th>
                        <th className="px-4 py-2">Utilisateur</th>
                        <th className="px-4 py-2">Service</th>
                        <th className="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {administrateurs &&
                        administrateurs.map((admin: any) => (
                            <tr key={admin.id}>
                                <td className="px-4 py-2">{admin.nom}</td>
                                <td className="px-4 py-2">{admin.user.nom}</td>
                                <td className="px-4 py-2">{admin.service}</td>
                                <td className="px-4 py-2 flex space-x-2">
                                    <button
                                        className="text-blue-500"
                                        onClick={() => {
                                            setSelectedAdmin(admin);
                                            setUpdateModalOpen(true);
                                        }}
                                    >
                                        {/* <FaEdit /> */}
                                    </button>
                                    <button
                                        className="text-red-500"
                                        onClick={() => handleDelete(admin)}
                                    >
                                        {/* <FaTrashAlt /> */}
                                    </button>
                                </td>
                            </tr>
                        ))}
                </tbody>
            </table>

            {/* Modal de création */}
            <Modal
                show={isCreateModalOpen}
                onClose={() => setCreateModalOpen(false)}
            >
                {/* <AdministrateurForm onSubmit={() => setCreateModalOpen(false)} /> */}
            </Modal>

            {/* Modal de mise à jour */}
            <Modal
                show={isUpdateModalOpen}
                onClose={() => setUpdateModalOpen(false)}
            >
                {/* <AdministrateurForm
          administrateur={selectedAdmin}
          onSubmit={() => setUpdateModalOpen(false)}
        /> */}
            </Modal>

            {/* Modal de confirmation de suppression */}
            {/* <ConfirmationModal
        show={isDeleteModalOpen}
        onClose={() => setDeleteModalOpen(false)}
        onConfirm={handleDeleteConfirmation}
        name={selectedAdmin?.nom}
      /> */}

            {/* Modal de succès */}
            {/* <SuccessModal
        show={isSuccessModalOpen}
        onClose={() => setSuccessModalOpen(false)}
        message="Administrateur supprimé avec succès !"
      /> */}
        </div>
    );
};

export default AdministrateurList;
