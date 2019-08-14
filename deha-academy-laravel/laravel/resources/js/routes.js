import ListUser from './components/user/List';
import AddUser from './components/user/Add';
import EditUser from './components/user/Edit';

export const routes = [
    {
        name: 'home',
        path: '/users',
        component: ListUser
    },
    {
        name: 'add',
        path: '/users/add',
        component: AddUser
    },
    {
        name: 'edit',
        path: '/users/edit/:id',
        component: EditUser
    }
];