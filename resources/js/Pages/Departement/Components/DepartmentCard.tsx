import { Department } from '@/types';
import React from 'react';

interface DepartmentCardProps {
  department: Department;
  onEdit: (id: string) => void;
  onDelete: (id: string) => void;
}

const DepartmentCard: React.FC<DepartmentCardProps> = ({ department, onEdit, onDelete }) => {
  return (
    <div className="department-card">
      <h3>{department.nom}</h3>
      <p><strong>Code:</strong> {department.code}</p>
      <p><strong>Description:</strong> {department.description}</p>
      <div>
        <button onClick={() => onEdit(department.id)} className="btn-edit">Modifier</button>
        <button onClick={() => onDelete(department.id)} className="btn-delete">Supprimer</button>
      </div>
    </div>
  );
};

export default DepartmentCard;
