$( '#table-department' ).Tabledit({
    url: '/department/update',
    deleteButton: false,
    restoreButton: false,
    columns: {
        identifier: [1, 'departmentid'],
        editable: [2, 'description']
    }    
});