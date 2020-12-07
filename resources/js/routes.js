import adminHome from './components/admin/adminHome'
import categoryList from './components/admin/category/list'
import addCategory from './components/admin/category/new'
import editCategory from './components/admin/category/edit'

import postList from './components/admin/post/list'
import addPost from './components/admin/post/new'
import editPost from './components/admin/post/edit'

import employee from './components/admin/employee'

//front end
import frontendHomepage from './components/frontend/frontendHome'
import blogHome from './components/frontend/blog/blogPost'
import blogSingle from './components/frontend/blog/singlePost'

export const projectRoutes = [
    {
        path: '/home',
        component: adminHome

    },
    {
        path: '/category-list',
        component: categoryList

    },
    {
        path: '/category-add',
        component: addCategory

    },
    {
        path: '/category-edit/:cat',
        component: editCategory

    },
    {
        path: '/post-list',
        component: postList

    },
    {
        path: '/post-add',
        component: addPost

    },
    {
        path: '/post-edit/:postId',
        component: editPost

    },
    // frontEnd
    {
        path: '/',
        component: frontendHomepage

    },
    {
        path: '/blog',
        component: blogHome

    },
    {
        path: '/single-post/:id',
        component: blogSingle

    },
    {
        path: '/category-posts/:id',
        component: blogHome

    },
    {
        path: '/employee',
        component: employee

    },
]
