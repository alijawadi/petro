import InputLabel from "@/Components/InputLabel.jsx";
import Select from "@/Components/Select.jsx";
import InputError from "@/Components/InputError.jsx";
import PrimaryButton from "@/Components/PrimaryButton.jsx";
import {useForm} from "@inertiajs/react";
import TextInput from "@/Components/TextInput.jsx";

export default function CreateOrderForm({clients, trucks}) {

    const {data, setData, post, errors, processing, recentlySuccessful} = useForm({
        client: '',
        amount: '',
        fuel_name: '',
    });

    const submit = (e) => {
        e.preventDefault();

        post(route('order.store'));
    };

    return (
        <section className="max-w-xl">
            <header>
                <h2 className="text-lg font-medium text-gray-900 dark:text-gray-100">Create Order</h2>

                <p className="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Create a new order.
                </p>
            </header>

            <form onSubmit={submit} className="mt-6 space-y-6">
                <div>
                    <InputLabel htmlFor="client" value="Client"/>
                    <Select
                        onChange={(value) => setData('client', value)}
                        items={clients}
                    />
                    <InputError className="mt-2" message={errors.client}/>
                </div>

                <div>
                    <InputLabel htmlFor="fuel_name" value="Fuel Name"/>
                    <TextInput
                        id="fuel_name"
                        className="mt-1 block w-full"
                        value={data.name}
                        onChange={(e) => setData('fuel_name', e.target.value)}
                        required
                    />
                    <InputError className="mt-2" message={errors.fuel_name}/>
                </div>

                <div>
                    <InputLabel htmlFor="amount" value="Amount"/>
                    <TextInput
                        id="amount"
                        className="mt-1 block w-full remove-arrow"
                        value={data.name}
                        onChange={(e) => setData('amount', e.target.value)}
                        required
                        type={'number'}
                    />
                    <InputError className="mt-2" message={errors.amount}/>
                </div>

                <div className="flex items-center gap-4">
                    <PrimaryButton disabled={processing}>Create Order</PrimaryButton>
                </div>

            </form>
        </section>

    )
}
