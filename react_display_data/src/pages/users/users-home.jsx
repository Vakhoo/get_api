import Users from '../../components/users/data';
import UsersProviderComponent from '../../providers/usersprovider';
function UserHome(props) {
  return (
    <UsersProviderComponent>
      <div className="row">
      <div className="col-md-7 mx-auto mt-5">
          <Users />
        </div>
      </div>
    </UsersProviderComponent>
  );
}

export default UserHome;
