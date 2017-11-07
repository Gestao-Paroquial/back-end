<template>
	<div class="col-md-12">
		<modal :showModal="showModalAdd" :closeModal="closeModalAdd" :title="'Adicionar Participante'">
			<simple-form slot="body" :inputs="inputs" :action="add" :btnMsg="'Adicionar'" :btnClass="'btn-fill btn-info btn-wd'">
			</simple-form>
		</modal>
		<modal :showModal="showModalUpdate" :closeModal="closeModalUpdate" :title="'Alterar Participante'">
			<simple-form slot="body" :inputs="inputsUpdate" :action="update" :btnClass="'btn-fill btn-warning  btn-wd'" :btnMsg="'Alterar'">
			</simple-form>
		</modal>
		<button type="button" class="btn btn-success btn-fill btn-wd" data-toggle="modal" data-target="#myModal" @click="showModalAdd = true">Adicionar
			<i class="fa fa-plus" aria-hidden="true"></i>
		</button>
		<div class="card card-plain">
			<paper-table type="hover" :getId="getId" :del="del" :title="table1.title" :sub-title="table1.subTitle" :data="pastorais" :columns="table1.columns">
			</paper-table>
		</div>
	</div>

	</div>
</template>
<script>
import PaperTable from 'components/UIComponents/PaperTable.vue'
import Modal from 'components/UIComponents/Modal/Modal.vue'
import SimpleForm from 'components/UIComponents/Forms/SimpleForm.vue'
const pastoraisHeaders = ['Id', 'Name', 'Dia']
const inputs = [
	{
		label: 'Nome',
		name: 'name',
		type: 'text',
		value: '',
		placeholder: '',
		required: true
	},
	{
		label: 'Dia e horário de encontro',
		name: 'dia',
		type: 'text',
		value: '',
		placeholder: '',
		required: false
	}
];
const pastorais = [
	{
		id: 10,
		name: 'Pastoral da Juventude',
		dia: 'Quarta feira 12:00'
	},
	{
		id: 21,
		name: 'Pastoral Teste',
		dia: 'Quarta feira 12:00'
	}
]

export default {
	components: {
		PaperTable,
		Modal,
		SimpleForm
	},
	data() {
		return {
			showModalAdd: false,
			showModalUpdate: false,
			inputs: inputs,
			inputsUpdate: [],
			pastorais: pastorais,
			table1: {
				title: 'Lista de Pastorais',
				subTitle: 'Aqui você ira encontrar a lista de pastorais completa',
				columns: [...pastoraisHeaders],
				data: [...pastorais]
			}
		}
	},
	methods: {
		closeModalAdd() {
			this.showModalAdd = false;
		},
		closeModalUpdate() {
			this.showModalUpdate = false;
		},
		add(pastoral) {
			this.pastorais.push(pastoral);
			this.showModalAdd = false;
		},
		del(id) {

			const index = this.pastorais.findIndex(pastoral => pastoral.id == id);

			if (confirm("Você tem certeza?"))
				this.pastorais.splice(index, 1);
		},
		getId(id) {
			const pastoral = this.pastorais.find(item => item.id == id);

			const inputs = [
				{
					label: 'Nome',
					name: 'name',
					type: 'text',
					value: pastoral.name,
					placeholder: '',
					required: true
				},
				{
					label: 'Telefone',
					name: 'dia',
					type: 'text',
					value: pastoral.dia,
					placeholder: '',
					required: false
				},
				{
					name: 'id',
					type: 'hidden',
					value: pastoral.id,
					required: true
				}
			];

			this.inputsUpdate = inputs;

			this.showModalUpdate = true;

		},
		update(pastoral) {
			const index = this.pastorais.findIndex(item => item.id == pastoral.id);

			this.$set(this.pastorais, index, pastoral);

			this.closeModalUpdate();
		}
	}
}

</script>
<style>

</style>
