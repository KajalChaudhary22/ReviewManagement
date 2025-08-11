<div class="modal" id="addUserModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add New User</h2>
                <button class="modal-close">&times;</button>
            </div>
            <div class="modal-body">
                <form id="userForm">
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="userName" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" id="userEmail" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="userPhone">
                    </div>
                    {{-- <div class="form-group">
                        <label class="form-label">User Type</label>
                        <select class="form-control" id="userType" required>
                            <option value="">Select User Type</option>
                            <option value="customer">Customer</option>
                            <option value="business">Business Owner</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" id="userPassword" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="cancelUser">Cancel</button>
                <button class="btn btn-primary" id="saveUser">Save User</button>
            </div>
        </div>
    </div>