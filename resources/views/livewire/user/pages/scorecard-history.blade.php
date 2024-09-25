<div>
    <div class="containerMod">
        @livewire('components.layouts.user-sidebar')
        <div class="mainMod" style="padding: 0;">
            <div class="sec">
                <div class="btn-toggle">
                    <button id="toggle-button">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="header-title">
                        <h4><strong>BPPO-Police Scorecard Management System</strong></h4>
                    </div>
                </div>
                <div class="mainScorecard">
                    <div class="history">
                        <div class="history-scorecard">
                            <h1><strong>HISTORY OF SCORECARD</strong></h1>
                            <div class="search">
                                <div class="searchinput">
                                    <input type="text" id="search" placeholder="Search scorecard...">
                                    <button onclick="">Search</button>
                                </div>
                            </div>
                            <table id="historyTable">
                                <thead>
                                    <tr>
                                        <th>Period Covered</th>
                                        <th class="action-btn">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Table rows will be dynamically inserted here -->
                                </tbody>
                            </table>
                            <div class="pagination-container">
                                <button id="prev" class="pagination-btn"><i class="fas fa-angle-left"></i></button>
                                <span id="pagination-numbers" class="pagination-numbers"></span>
                                <button id="next" class="pagination-btn"><i
                                        class="fas fa-angle-right"></i></button>
                            </div>
                        </div>
                        <div class="history-promotion">
                            <h1><strong>RECENT PROMOTIONS</strong></h1>
                            <div class="divider">
                                <img src="/assets/police-badge-police-svgrepo-com.svg" alt="Badge" width="50px"
                                    height="50px">
                            </div>
                            <div class="promotion-content" id="promotionItems">
                                <ul>
                                    <!-- Promotion items will be dynamically inserted here -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        body {
            background: #dfe9f5;
        }
    </style>
</div>
