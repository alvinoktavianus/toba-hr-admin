$('#table-department').Tabledit({
    url: '/department/update',
    editButton: false,
    deleteButton: false,
    hideIdentifier: false,
    columns: {
        identifier: [0, 'departmentid'],
        editable: [[1, 'description']]
    }
});