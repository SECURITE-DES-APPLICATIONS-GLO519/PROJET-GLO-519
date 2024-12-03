import React from 'react';
import DepartmentCard from './DepartmentCard';
import { Department } from '@/types';

interface DepartmentListProps {
  departments: Department[];
  onEdit: (id: string) => void;
  onDelete: (id: string) => void;
}

const DepartmentList: React.FC<DepartmentListProps> = ({ departments, onEdit, onDelete }) => {
  return (
    <div className="department-list">
      {departments.length === 0 ? (
        <p>Aucun département trouvé.</p>
      ) : (
        departments.map((department) => (
          <DepartmentCard
            key={department.id}
            department={department}
            onEdit={onEdit}
            onDelete={onDelete}
          />
        ))
      )}
    </div>
  );
};

export default DepartmentList;
