$('#table-department').Tabledit({
    url: '/toba-hr-admin/department/update',
    editButton: false,
    deleteButton: false,
    hideIdentifier: false,
    columns: {
        identifier: [0, 'departmentid'],
        editable: [[1, 'description']]
    }
});