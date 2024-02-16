import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import CreateOrderForm from "@/Pages/Order/Partials/CreateOrderForm.jsx";

const Create = function Create({auth, clients, trucks, Locations}) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={"Create Order"}
        >
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div className="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <CreateOrderForm clients={clients} trucks={trucks}/>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    )
}

export default Create
