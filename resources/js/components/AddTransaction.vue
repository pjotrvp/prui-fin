<template>
  <div>
    <h2>Voeg een nieuwe investering toe</h2>
    <form @submit.prevent="submitInvestment">
      <div>
        <label for="investment_name">Naam van de investering</label>
        <input 
          type="text" 
          id="investment_name" 
          v-model="form.investment_name" 
          required 
          placeholder="Bijv. Aandelen, Crypto, Vastgoed"
        />
      </div>
      <div>
        <label for="amount">Bedrag</label>
        <input 
          type="number" 
          id="amount" 
          v-model="form.amount" 
          required 
          placeholder="Bijv. 5000" 
        />
      </div>
      <div>
        <label for="type">Type investering</label>
        <select id="type" v-model="form.type" required>
          <option value="stocks">Aandelen</option>
          <option value="crypto">Cryptocurrency</option>
          <option value="real_estate">Vastgoed</option>
          <option value="other">Overig</option>
        </select>
      </div>
      <div>
        <label for="investment_date">Datum van investering</label>
        <input 
          type="date" 
          id="investment_date" 
          v-model="form.date" 
          required 
        />
      </div>
      <div>
        <label for="category">Categorie</label>
        <select id="category" v-model="form.category_id" required>
          <option v-for="category in categories" :key="category.id" :value="category.id">
            {{ category.name }}
          </option>
        </select>
      </div>
      <button type="submit">Toevoegen</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        investment_name: "", // Naam van de investering
        amount: null,        // Bedrag van de investering
        type: "stocks",      // Standaardtype: Aandelen
        date: "",            // Datum van de investering
        category_id: null,   // Categorie ID
      },
      categories: [], // Categorieën ophalen van de server
    };
  },
  methods: {
    async fetchCategories() {
      // Haal de categorieën op van de server
      const response = await fetch("/categories");
      this.categories = await response.json();
    },
    async submitInvestment() {
      try {
        const response = await fetch("/investments", { // Stuur het naar de juiste API-endpoint
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(this.form),
        });

        if (!response.ok) {
          const errorData = await response.json();
          console.error("Fout:", errorData);
          return;
        }

        const result = await response.json();
        alert(result.message);

        // Reset het formulier
        this.form = {
          investment_name: "",
          amount: null,
          type: "stocks",
          date: "",
          category_id: null,
        };
      } catch (error) {
        console.error("Fout bij het toevoegen van investering:", error);
      }
    },
  },
  mounted() {
    this.fetchCategories(); // Haal de categorieën op als de component wordt geladen
  },
};
</script>

<style scoped>
form {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}
label {
  font-weight: bold;
}
</style>
