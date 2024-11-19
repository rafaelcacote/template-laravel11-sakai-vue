import { useApp } from "@/Assets/Composables";
import { useMediaQuery } from "@vueuse/core";
import { computed, reactive, watch } from "vue";
import { PrimeIcons as PI } from "@primevue/core/api";

//* Desativar Globalmente a sidabar
const app = useApp();

/** @type {{ items: [], visible: boolean, autoReopen: boolean, mostrarSideBarMenu: boolean }} */
const sidebar = reactive({
	items: [
		{
			label: "Início",
			icon: PI.HOME,
			route: "dashboard",
		},
		{
			label: "Tarefas",
			icon: PI.HOME,
			route: "tarefa.index",
		},
	],
	visible: false,
	autoReopen: false,
	mostrarSideBarMenu: true,
});

export function useSidebar() {
	const setItems = (items) => {
		sidebar.items = items;
	};

	const toggle = () => {
		sidebar.visible = !sidebar.visible;
	};

	return {
		state: sidebar,
		setItems,
		toggle,
	};
}

export const mquery = useMediaQuery("(max-width: 1024px)");

const menubar = reactive({
	visible: true,
});

export function useMenubar() {
	return { menubar };
}

watch(mquery, (smallWidth) => {
	if (smallWidth) {
		// sidebar.visible = false;
		// sidebar.autoReopen = true;
		menubar.visible = false;
	} else {
		menubar.visible = true;
		// if (sidebar.autoReopen) {
		// sidebar.visible = true;
		// sidebar.autoReopen = false;
		// }
	}
});
