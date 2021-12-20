const baseURL = 'http://127.0.0.1:8080/get_api/api/index.php';

export class API_USERS_SERVICE {
  static async getUsersListAsync() {
    try {
      const response = await fetch(baseURL);
      const result = await response.json();
      return result;
    } catch (err) {
      console.trace(err);
    }
  }
}
export default API_USERS_SERVICE;
