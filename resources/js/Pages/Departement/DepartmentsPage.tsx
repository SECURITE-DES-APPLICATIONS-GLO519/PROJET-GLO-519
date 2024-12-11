import { Department } from "@/types";
import React, { useState, useEffect } from "react";
import DepartmentForm from "./Components/DepartementForm";
import DepartmentList from "./Components/DepartementList";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, usePage } from "@inertiajs/react";
import "../../../css/style.css";
import Modal from "@/Components/Modal";
import { Inertia } from "@inertiajs/inertia";
import { useSnackbar } from "notistack";

const DepartmentPage: React.FC = () => {
    const { departments } = usePage().props;

    const [tables, setTables] = useState<any>([]);
    const [selectedDepartment, setSelectedDepartment] =
        useState<Department | null>(null);

    const [modalMessage, setModalMessage] = useState("");
    const [modalStatus, setModalStatus] = useState<"success" | "error">(
        "success"
    );
    const { enqueueSnackbar } = useSnackbar();

    const handleDelete = (formData: any) => {
        debugger
        Inertia.delete(route("departement.delete", formData), {
            onSuccess: () => {
                // Affiche un message de confirmation
                setModalMessage("Département supprimé avec succès!");
                setModalStatus("success");
                setIsModalOpenSuppression(true);
            },
            onError: () => {
                // Affiche un message d'erreur
                setModalMessage(
                    "Erreur lors de la suppression du département."
                );
                setModalStatus("error");
                setIsModalOpenSuppression(true);
            },
        });
    };

    useEffect(() => {
        setTables(departments);
        // getDepartments().then((data) => setDepartments(data));
    }, [departments]);

    const handleCreateOrUpdate = (department: Department) => {
        if (department.id) {
            // updateDepartment(department).then(() => {
            //   setDepartments(departments.map(d => d.id === department.id ? department : d));
            //   setSelectedDepartment(null);
            // });
        } else {
            // createDepartment(department).then((newDepartment) => {
            //   setDepartments([...departments, newDepartment]);
            // });
        }
    };

    // const handleDelete = (id: string) => {
    //     Inertia.delete(route("departement.delete", id), {
    //         onSuccess: () => {
    //             // Message de succès après la suppression
    //             enqueueSnackbar("Département supprimé avec succès!", {
    //                 variant: "success",
    //             });
    //         },
    //         onError: (errors) => {
    //             // Message d'erreur si la suppression échoue
    //             enqueueSnackbar(
    //                 "Erreur lors de la suppression du département.",
    //                 { variant: "error" }
    //             );
    //         },
    //     });
    // };

    const [isModalOpenSuppression, setIsModalOpenSuppression] = useState(false); // Contrôle l'ouverture du modal

    const [isModalOpen, setIsModalOpen] = useState(false); // Contrôle l'ouverture du modal
    // Fonction qui gère la soumission du formulaire
    // const handleCreateOrUpdate = (department: Department) => {
    //   console.log('Département soumis:', department);
    //   setIsModalOpen(false); // Ferme le modal après la soumission
    // };

    // Ouvre le modal avec un département sélectionné pour modification
    const handleSelectDepartment = (dept: Department) => {
        setSelectedDepartment(dept);
        setIsModalOpen(true); // Ouvre le modal en mode édition
    };

    // Ouvre le modal sans département sélectionné pour création
    const handleCreateDepartment = () => {
        setSelectedDepartment(null);
        setIsModalOpen(true); // Ouvre le modal en mode création
    };
// hi
    return (
        <AuthenticatedLayout
            header={
                <div>
                    <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                        Departement
                    </h2>
                    {/* Bouton pour ajouter un nouveau département */}
                    <button
                        onClick={handleCreateDepartment}
                        className="mb-4 p-2 bg-blue-500 text-white rounded-md"
                    >
                        Ajouter un département
                    </button>
                </div>
            }
        >
            <Head title="Departement" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                        <div className="p-6 text-gray-900 dark:text-gray-100">
                            <div className="department-page">
                                <div className="content">
                                    <DepartmentList
                                        departments={tables}
                                        onEdit={(id) => {
                                            // const dept = departments.find(
                                            //     (d) => d.id === id
                                            // );

                                            // handleSelectDepartment(dept);
                                            // setSelectedDepartment(dept || null);
                                        }}
                                        onDelete={(id) =>
                                        {
                                            // const dept = departments.find(
                                            //     (d) => d.id === id
                                            // );
                                            
                                            // handleDelete(dept)
                                        }
                                        }
                                    />
                                    {/* Affichage du Modal avec le formulaire si `isModalOpen` est true */}
                                    <Modal
                                        show={isModalOpen}
                                        onClose={() => setIsModalOpen(false)}
                                    >
                                        <DepartmentForm
                                            // department={selectedDepartment}
                                            onSubmit={handleCreateOrUpdate}
                                        />
                                    </Modal>

                                    {/* Modal de Confirmation de suppression */}
                                    <Modal
                                        show={isModalOpenSuppression}
                                        onClose={() => setIsModalOpenSuppression(false)}
                                    >
                                        <h3 className="text-xl font-semibold text-center mb-4">
                                            {modalStatus === "success"
                                                ? "Succès"
                                                : "Erreur"}
                                        </h3>
                                        <p className="text-center mb-6">
                                            {modalMessage}
                                        </p>
                                        <div className="flex justify-center space-x-4">
                                            <button
                                                className="px-4 py-2 text-gray-700 bg-gray-300 rounded-md"
                                                onClick={() =>
                                                    setIsModalOpenSuppression(false)
                                                }
                                            >
                                                Fermer
                                            </button>
                                        </div>
                                    </Modal>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default DepartmentPage;
