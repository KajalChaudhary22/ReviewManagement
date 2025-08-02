<div class="modal" id="addBusinessModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Add New Business</h2>
                <button class="modal-close">&times;</button>
            </div>
            <div class="modal-body">
                <form id="businessForm">
                    <div class="form-group">
                        <label class="form-label">Business Name</label>
                        <input type="text" class="form-control" id="businessName" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <select class="form-control" id="businessCategory" required>
                            <option value="">Select Category</option>
                            <option value="pharmacy">Pharmacy</option>
                            <option value="hospital">Hospital</option>
                            <option value="clinic">Clinic</option>
                            <option value="laboratory">Laboratory</option>
                            <option value="distributor">Distributor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Location</label>
                        <select class="form-control" id="businessLocation" required>
                            <option value="">Select Location</option>
                            <option value="us">United States</option>
                            <option value="uk">United Kingdom</option>
                            <option value="ca">Canada</option>
                            <option value="au">Australia</option>
                            <option value="in">India</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Owner</label>
                        <select class="form-control" id="businessOwner" required>
                            <option value="">Select Owner</option>
                            <option value="1002">Michael Chen</option>
                            <option value="1004">David Kim</option>
                            <option value="1005">Robert Taylor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" id="businessDescription" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="cancelBusiness">Cancel</button>
                <button class="btn btn-primary" id="saveBusiness">Save Business</button>
            </div>
        </div>
    </div>