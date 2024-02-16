import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import PrimaryButton from "@/Components/PrimaryButton.jsx";
import Paginator from "@/Components/Paginator.jsx";

const Index = function ({auth, orders}) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={"Orders"}
        >
            <div className="py-12">

                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-100 dark:bg-gray-900">
                    <PrimaryButton className={"mb-8 my-0 mx-auto"}>
                        <a href={route('order.create')}>Create an order</a>
                    </PrimaryButton>
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-6">
                        <ul role="list" className="divide-y dark:divide-gray-100">
                            {orders.data.map((order) => (
                                <li key={order.id} className="flex justify-between gap-x-6 py-5">
                                    <div className="flex min-w-0 gap-x-4">
                                        <div className="min-w-0 flex-auto">
                                            <p className="text-sm font-semibold leading-6 text-gray-800 dark:text-gray-200">Fuel: {order.fuel_name}</p>
                                            <p className="mt-1 truncate text-xs leading-5 text-gray-800 dark:text-gray-200">Client Name: {order.client.name}</p>
                                            <p className="mt-1 truncate text-xs leading-5 text-gray-800 dark:text-gray-200">Amount: {order.amount}</p>
                                        </div>
                                    </div>
                                    <div className="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                        <p className="text-sm leading-6 text-gray-500 dark:text-gray-500">{order.created_at_string}</p>
                                        <p className="mt-1 text-xs leading-5 text-gray-500 dark:text-gray-500">
                                            Created at <time
                                            dateTime={order.created_at}>{order.created_at_human_readable}</time>
                                        </p>
                                    </div>
                                </li>
                            ))}
                        </ul>
                    </div>
                    <Paginator pageData={orders}/>
                </div>
            </div>
        </AuthenticatedLayout>
    )
}

export default Index
