<template>
    <div class="assistente-wrapper">
        <button class="assistente-fab" @click="toggle">
            <span v-if="!open">Ajuda</span>
            <span v-else>Fechar</span>
        </button>

        <div v-if="open" class="assistente-panel">
            <div class="assistente-header">
                <strong>Assistente da Loja</strong>
                <small>Faça perguntas sobre produtos, categorias e navegação.</small>
            </div>
            <div class="assistente-messages">
                <div v-for="(msg, i) in messages" :key="i" :class="['msg', msg.role]">
                    <span>{{ msg.text }}</span>
                </div>
                <div v-if="loading" class="msg bot">
                    <span>Digitando...</span>
                </div>
            </div>
            <form class="assistente-input" @submit.prevent="send">
                <input
                    v-model="input"
                    type="text"
                    placeholder="Ex.: Quais categorias temos?"
                    :disabled="loading"
                />
                <button type="submit" :disabled="loading || !input.trim()">Enviar</button>
            </form>
            <div v-if="error" class="assistente-error">{{ error }}</div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            open: false,
            input: '',
            loading: false,
            error: '',
            messages: [
                { role: 'bot', text: 'Oi! Posso te ajudar a encontrar produtos e navegar no site.' },
            ],
        };
    },
    methods: {
        toggle() {
            this.open = !this.open;
            this.error = '';
        },
        async send() {
            const text = this.input.trim();
            if (!text) return;
            this.messages.push({ role: 'user', text });
            this.input = '';
            this.error = '';
            this.loading = true;

            try {
                const { data } = await window.axios.post('/api/assistente', { message: text });
                this.messages.push({ role: 'bot', text: data.answer || 'Sem resposta.' });
            } catch (err) {
                this.error = 'Não foi possível responder agora.';
            } finally {
                this.loading = false;
            }
        },
    },
};
</script>

<style scoped>
.assistente-wrapper {
    position: fixed;
    right: 20px;
    bottom: 20px;
    z-index: 9999;
    font-family: "Nunito", sans-serif;
}
.assistente-fab {
    background: #111;
    color: #fff;
    border: none;
    border-radius: 10px;
    padding: 10px 14px;
    font-size: 14px;
    cursor: pointer;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
}
.assistente-panel {
    width: 360px;
    background: #fff;
    border-radius: 8px;
    border: 1px solid #e3e3e3;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    margin-top: 10px;
    overflow: hidden;
}
.assistente-header {
    padding: 12px 14px;
    background: #f1f3f5;
    border-bottom: 1px solid #eee;
    display: flex;
    flex-direction: column;
    gap: 4px;
}
.assistente-header strong {
    color: #1f2937;
    font-size: 15px;
}
.assistente-header small {
    color: #4b5563;
    font-size: 12px;
}
.assistente-messages {
    max-height: 280px;
    overflow-y: auto;
    padding: 12px;
    display: flex;
    flex-direction: column;
    gap: 8px;
}
.msg {
    padding: 8px 10px;
    border-radius: 8px;
    line-height: 1.35;
    font-size: 14px;
    color: #1f2937;
}
.msg.user {
    align-self: flex-end;
    background: #d6ecff;
    border: 1px solid #b8dcff;
}
.msg.bot {
    align-self: flex-start;
    background: #f5f5f5;
    border: 1px solid #e5e5e5;
}
.assistente-input {
    display: flex;
    gap: 6px;
    padding: 10px;
    border-top: 1px solid #eee;
}
.assistente-input input {
    flex: 1;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 8px;
    font-size: 14px;
}
.assistente-input button {
    border: none;
    background: #2c7be5;
    color: #fff;
    border-radius: 8px;
    padding: 8px 10px;
    cursor: pointer;
    font-size: 14px;
}
.assistente-error {
    padding: 8px 12px 12px;
    color: #b00020;
    font-size: 13px;
}
</style>
