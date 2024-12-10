import { useForm } from "@inertiajs/vue3";

export const formCreate = useForm({
	amount: "",
	start_date: "",
	end_date: "",
	category_id: "",
});

export const formEdit = useForm({
	id: null,
	amount: "",
	start_date: "",
	end_date: "",
	category_id: "",
});

export const formDelete = useForm({
	id: null,
});
