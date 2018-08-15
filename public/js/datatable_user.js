$(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('usuario.getUsers') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'institution.description_institution', name: 'institution.description_institution' },
                    { data: 'management.description_management', name: 'management.description_management' },
                    { data: 'department.description_department', name: 'department.description_department' },
                    { data: 'role.description_role', name: 'role.description_role' },
                    { data: 'action', name: 'action', orderable: false, searchable: false}

                ]
            });
        });