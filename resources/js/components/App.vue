<template>
    <div>
        <h1>Prui fin!</h1>
        <p>Track your investments!</p>
    </div>
    <table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Amount</th>
            <th>Type</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="transaction in transactions" :key="transaction.id">
            <td>{{ transaction.description }}</td>
            <td>{{ transaction.amount }}</td>
            <td>{{ transaction.type }}</td>
        </tr>
    </tbody>
</table>
<AddTransaction />
</template>

<script>
import AddTransaction from './AddTransaction.vue';

export default {
    components: {
        AddTransaction,
    },
    data() {
        return {
            transactions: [],
        };
    },
    mounted() {
        fetch('/transactions')
            .then(response => response.json())
            .then(data => {
                this.transactions = data;
            });
    },
};
</script>