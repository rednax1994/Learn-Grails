const invoiceRoutes = FlowRouter.group({
    name: 'invoices'
});

invoiceRoutes.route('/invoices', {
    name: 'invoices',
    action(){
        ReactLayout.render(App, { yield: <InvoicesList /> } );
    }
});

invoiceRoutes.route('/invoices/:_id', {
    name: 'invoice',
    action( params ) {
        ReactLayout.render(App, { yield: <Invoice invoice={ params._id } /> } );
    }
});