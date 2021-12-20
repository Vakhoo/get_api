import { useContext } from 'react';
import { UsersProvider } from '../../../providers/usersprovider';
import UserItem from './user-item';
function Users(props) {
  const { testList } = useContext(UsersProvider);
  return (
    <ul className="list-group">
      {testList.map((test, i) => {
        return <UserItem test={test} key={i}/>;
      })}
    </ul>
  );
}

export default Users;
