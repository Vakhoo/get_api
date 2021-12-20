

function UserItem({ test }) {
  return (
    <li className="list-group-item d-flex justify-content-around align-items-center p-3 mb-2 bg-light text-dark">
    <img src={test.avatar} alt={test.firstname} />
     <div className="text-info">
      {test.firstname} {test.lastname} <br></br>
      {test.email}
     </div>
    </li>
  );
}

export default UserItem;
