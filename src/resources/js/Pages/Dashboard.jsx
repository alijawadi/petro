import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

const Dashboard = function Dashboard({auth, orders}) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={"Dashboard"}
        >

            <div className="App">
                {orders && orders.map(order => order.id)}
            </div>

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900 dark:text-gray-100">You're logged in!</div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}

export default Dashboard
