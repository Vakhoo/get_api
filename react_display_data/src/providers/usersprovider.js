import React, { useEffect, useState } from 'react';
import { API_USERS_SERVICE } from '../services/api-users';

export const UsersProvider = React.createContext(null);

function UsersProviderComponent({ children }) {
  const [testList, setTestList] = useState([]);



  useEffect(() => {
    (async () => {
      const data = await API_USERS_SERVICE.getUsersListAsync();
      setTestList(data);
    })();
  }, []);
  return (
    <UsersProvider.Provider
      value={{
        testList
      }}>
      {children}
    </UsersProvider.Provider>
  );
}

export default UsersProviderComponent;
