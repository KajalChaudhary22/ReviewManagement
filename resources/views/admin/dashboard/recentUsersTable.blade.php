
    <div class="dashboard-main">
        <!-- Recent User Signups -->
        <div class="table-container">
            <div class="table-header">
                <h2 class="section-title">Recent User Signups</h2>
                <a href="#" class="action-link">View All</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Registration Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Sarah Johnson</td>
                        <td>sarah@example.com</td>
                        <td>Dec 12, 2023</td>
                        <td><span class="status-badge status-active">Active</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn view">View</button>
                                <button class="action-btn suspend">Suspend</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Michael Chen</td>
                        <td>michael@example.com</td>
                        <td>Dec 11, 2023</td>
                        <td><span class="status-badge status-pending">Pending</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn view">View</button>
                                <button class="action-btn reject">Reject</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Emma Wilson</td>
                        <td>emma@example.com</td>
                        <td>Dec 11, 2023</td>
                        <td><span class="status-badge status-active">Active</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn view">View</button>
                                <button class="action-btn suspend">Suspend</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>David Kim</td>
                        <td>david@example.com</td>
                        <td>Dec 10, 2023</td>
                        <td><span class="status-badge status-suspended">Suspended</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="action-btn view">View</button>
                                <button class="action-btn activate">Activate</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

       
    

    
        <!-- Latest Reviews -->
        <div class="table-container">
            <div class="table-header">
                <h2 class="section-title">Latest Reviews</h2>
                <a href="#" class="action-link">View All</a>
            </div>
            <div class="review-cards">
                <div class="review-card positive">
                    <div class="review-header">
                        <div class="review-user">David Lee</div>
                        <div class="review-time">2 hours ago</div>
                    </div>
                    <div class="review-stars">★★★★★</div>
                    <div class="review-text">
                        Excellent service and fast delivery. The medication was exactly as described and arrived in
                        perfect condition.
                    </div>
                    <div class="review-actions">
                        <button class="btn btn-success btn-sm approve-review">Approve</button>
                        <button class="btn btn-danger btn-sm reject-review">Reject</button>
                        <button class="btn btn-secondary btn-sm view-review">View</button>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-header">
                        <div class="review-user">Rachel Green</div>
                        <div class="review-time">5 hours ago</div>
                    </div>
                    <div class="review-stars">★★★☆☆</div>
                    <div class="review-text">
                        The product quality was good but the delivery took longer than expected. Customer service was
                        helpful though.
                    </div>
                    <div class="review-actions">
                        <button class="btn btn-success btn-sm approve-review">Approve</button>
                        <button class="btn btn-danger btn-sm reject-review">Reject</button>
                        <button class="btn btn-secondary btn-sm view-review">View</button>
                    </div>
                </div>
                <div class="review-card negative">
                    <div class="review-header">
                        <div class="review-user">Tom Wilson</div>
                        <div class="review-time">1 day ago</div>
                    </div>
                    <div class="review-stars">★☆☆☆☆</div>
                    <div class="review-text">
                        Very disappointed with my purchase. The product arrived damaged and customer service was
                        unresponsive.
                    </div>
                    <div class="review-actions">
                        <button class="btn btn-success btn-sm approve-review">Approve</button>
                        <button class="btn btn-danger btn-sm reject-review">Reject</button>
                        <button class="btn btn-secondary btn-sm view-review">View</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="table-container">
            <div class="table-header">
                <h2 class="section-title">Quick Actions</h2>
            </div>
            <div style="padding: 15px; display: grid; gap: 10px;">
                <button class="btn btn-primary" id="addNewUserBtn">
                    <i class="icon">➕</i> Add New User
                </button>
                <button class="btn btn-primary" id="addNewBusinessBtn">
                    <i class="icon">🏢</i> Add Business
                </button>
                <button class="btn btn-black" id="generateReportBtn">
                    <i class="icon">📊</i> Generate Report
                </button>
            </div>
        </div>
    </div>
</div>