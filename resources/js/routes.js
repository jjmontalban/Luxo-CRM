import adminHome from './components/admin/adminHome'

import customerList from './components/admin/customer/list'
import customerView from './components/admin/customer/view'

//front end
import frontendHomepage from './components/frontend/frontendHome'

export const projectRoutes = [
    {
        path: '/home',
        component: adminHome

    },
    {
        path: '/clientes',
        component: customerList

    },
    {
        path: '/cliente/:customerId',
        component: customerView

    },
    // frontEnd
    {
        path: '/',
        component: frontendHomepage

    },
]
