import { useForm } from "@inertiajs/vue3";

export const formCreate = useForm({
	name: "",
	description: "",
});

export const formEdit = useForm({
	id: null,
	name: "",
	description: "",
});

export const formDelete = useForm({
	id: null,
});
