import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import Paginator from "@/Components/Paginator.jsx";
import PrimaryButton from "@/Components/PrimaryButton.jsx";

const Index = function ({auth, clients}) {

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={"Clients"}
        >
            <div className="py-12">

                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-100 dark:bg-gray-900">
                    <PrimaryButton className={"mb-8 my-0 mx-auto"}>
                        <a href={route('client.create')}>Create a client</a>
                    </PrimaryButton>
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-6">
                        <ul role="list" className="divide-y dark:divide-gray-100">
                            {clients.data.map((client) => (
                                <li key={client.id} className="flex justify-between gap-x-6 py-5">
                                    <div className="flex min-w-0 gap-x-4">
                                        <div className="min-w-0 flex-auto">
                                            <p className="text-sm font-semibold leading-6 text-gray-800 dark:text-gray-200">{client.name}</p>
                                            <p className="mt-1 truncate text-xs leading-5 text-gray-800 dark:text-gray-200">{client.location.address}</p>
                                        </div>
                                    </div>
                                    <div className="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                        <p className="text-sm leading-6 text-gray-900"></p>
                                        <p className="mt-1 text-xs leading-5 text-gray-500 dark:text-gray-500">
                                            Created at <time
                                            dateTime={client.created_at}>{client.created_at_human_readable}</time>
                                        </p>
                                    </div>
                                </li>
                            ))}
                        </ul>
                    </div>
                    <Paginator pageData={clients}/>
                </div>
            </div>
        </AuthenticatedLayout>
    )
}

export default Index
