export class AuthService {
  constructor(apiBaseUrl) {
    this.apiBaseUrl = apiBaseUrl;
  }

  async login(email, senha) {
    try {
      const response = await fetch(`${this.apiBaseUrl}/login`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json'
        },
        body: JSON.stringify({ email, senha }),
        credentials: 'include' 
      });

      if (!response.ok) {
        const error = await response.json();
        throw new Error(error.message || 'Erro no login');
      }

      return await response.json();
    } catch (error) {
      throw error;
    }
  }

  async logout() {
    try {
      const response = await fetch(`${this.apiBaseUrl}/logout`, {
        method: 'POST',
        headers: {
          'Accept': 'application/json'
        },
        credentials: 'include'
      });

      if (!response.ok) {
        throw new Error('Erro ao fazer logout');
      }

      return await response.json();
    } catch (error) {
      throw error;
    }
  }

  async me() {
    try {
      const response = await fetch(`${this.apiBaseUrl}/me`, {
        method: 'GET',
        headers: {
          'Accept': 'application/json'
        },
        credentials: 'include'
      });

      if (!response.ok) {
        throw new Error('Erro ao obter informações do usuário');
      }

      return await response.json();
    } catch (error) {
      throw error;
    }
  }
}
