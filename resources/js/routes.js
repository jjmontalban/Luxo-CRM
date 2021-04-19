import customerList from './components/admin/customer/list'
import customerView from './components/admin/customer/view'


export const projectRoutes = [
    {
        path: '/clientes',
        component: customerList

    },
    {
        path: '/cliente/:customerId',
        component: customerView

    },
]
