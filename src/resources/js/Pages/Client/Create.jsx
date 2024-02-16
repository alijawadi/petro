import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import ClientForm from "./Partials/ClientForm";

const Create = function Create({auth}) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={"Create Client"}
        >
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div className="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <ClientForm/>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    )
}

export default Create
