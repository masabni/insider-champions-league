import axios from "axios"

export default {
    getAccessToken: () => {
        return axios({
            baseURL: process.env.VUE_APP_API_URL,
            url: 'oauth/token',
            method: 'post',
            data: {
                grant_type: 'client_credentials',
                client_id: process.env.VUE_APP_CLIENT_ID,
                client_secret: process.env.VUE_APP_CLIENT_SECRET
            }
        })
    },
    getCurrentWeek: () => {
        return axios.get('weeks/current');
    },
    getLeague: () => {
        return axios.get('league');
    },
    getWeekMatches: (weekId) => {
        return axios.get(`matches/${weekId}`);
    },
    getPredictions: () => {
        return axios.get('predictions');
    },
    playNextWeek: () => {
        return axios.post('matches');
    },
    playAll: () => {
        return axios.post('matches/playAll');
    },
    getFeaturedFaqs: () => {
        return axios.get('featured_faq');
    },
    getTutorials: () => {
        return axios.get('tutorials');
    },
    contactUs: (data) => {
        return axios.post('contact_us', data);
    },
    forgotPassword: (data) => {
        return axios.post('forgot_password', data);
    },
    resetPassword: (data) => {
        return axios.post('reset_password', data);
    },
    resendEmailVerifyCode: (data) => {
        return axios.post('users/resend_email_verification_code', data);
    },
    verifyEmail: (data) => {
        return axios.post('users/verify_email', data);
    },
    saveUsername: (data) => {
        return axios.post('users/username', data);
    },
    saveAccountDetails: (data) => {
        return axios.post('users/account_details', data);
    },
    getAccountDetails: () => {
        return axios.get('users/account_details');
    },
    getUserProfile: (userId) => {
        return axios.get(`users/${userId}/profile`);
    },
    setFCMToken: (token) => {
        return axios.post('users/preferences/fcm_token', {fcm_token: token});
    },
    logout: () => {
        return axios.post('logout');
    },
    deactivateAccount: () => {
        return axios.post('users/deactivate_account');
    },
    getProfileMetadata: () => {
        return axios.get('users/metadata');
    },
    getCountries: () => {
        return axios.get('countries');
    },
    getCities: (country_id) => {
        return axios.get(`countries/${country_id}/cities`);
    },
    addFunds: (data = {}) => {
        return axios.post('/users/add_funds', data);
    },
    resendMobileVerifyCode: (data) => {
        return axios.post('users/resend_phone_verification_code', data);
    },
    verifyPhone: (data) => {
        return axios.post('users/verify_phone', data);
    },
    changeProfilePicture: (data) => {
        return axios.post('users/profile_picture', data, {
            headers: { 'content-type': 'multipart/form-data' }
        });
    },
    getCategories: () => {
        return axios.get('pools/categories');
    },
    getPools: (data = ['type', 'categories', 'pool_type', 'skip', 'limit', 'posts']) => {
        return axios.get(`pools/${data['type']}`,  {params: {
                categories: data['categories'],
                pool_type: data['pool_type'],
                skip: data['skip'],
                limit: data['limit'],
                posts: data['posts'],
            }
        });
    },
    getWatchlist: (data = ['post', 'skip', 'limit']) => {
        return axios.get('watchlist',  {params: {
                post: data['post'],
                skip: data['skip'],
                limit: data['limit'],
            }
        });
    },
    getUserVotedPosts: (data = ['skip', 'limit']) => {
        return axios.get('users/voted_posts',  {params: {
                skip: data['skip'],
                limit: data['limit'],
            }
        });
    },
    getUserPosts: (userId, data = ['skip', 'limit']) => {
        return axios.get(`users/${userId}/posts`,  {params: {
                skip: data['skip'],
                limit: data['limit'],
            }
        });
    },
    getPool: (id) => {
        return axios.get(`pools/${id}`);
    },
    getBalance: () => {
        return axios.get('users/get_balances');
    },
    getPackages: () => {
        return axios.get('packages');
    },
    getPaymentCards: () => {
        return axios.get('users/payment_cards');
    },
    addPost: (data) => {
        return axios.post('posts', data, {
            headers: { 'content-type': 'multipart/form-data' }
        });
    },
    vote: (id) => {
        return axios.post(`posts/${id}/vote`);
    },
    addToWatchlist: (data) => {
        return axios.post('watchlist', data);
    },
    removeFromWatchlist: (data) => {
        return axios.post('watchlist', {...data, '_method': 'delete'});
    },
    deletePaymentCard: (paymentCardId) => {
        return axios.delete(`users/payment_cards/${paymentCardId}`);
    },
    setPaymentCardAsDefault: (paymentCardId) => {
        return axios.post(`users/payment_cards/${paymentCardId}/set_as_default`);
    },
    makeWithdraw: (data) => {
        return axios.post('users/withdrawals', data);
    },
    getTransactions: (data = ['skip', 'limit']) => {
        return axios.get('users/transactions',  {params: {
                skip: data['skip'],
                limit: data['limit'],
            }
        });
    },
    getTransaction: (transactionId) => {
        return axios.get(`users/transactions/${transactionId}`);
    },
    checkDisplayNameOption: () => {
        return axios.get('users/preferences/show_name');
    },
    checkPushNotificationsOption: () => {
        return axios.get('users/preferences/push_notifications');
    },
    changePassword: (data) => {
        return axios.post('users/change_password', data);
    },
    updateUserPreferences: (data) => {
        return axios.patch('users/preferences', data);
    },
    getUserGallery: (userId) => {
        return axios.get(`users/${userId}/gallery`);
    },
    reportGalleryItem: (galleryItemId, note = null) => {
        return axios.post(`gallery/${galleryItemId}/report`, {note: note});
    },
    termsAndConditions: () => {
        return axios.get('terms_and_conditions');
    },
    getUserAccounts: () => {
        return axios.get('users/accounts');
    },
    linkUserAccount: (provider, accessToken) => {
        return axios.post('users/accounts/link', {provider: provider, access_token: accessToken});
    },
    linkUserInstagramAccount: (provider, accessToken) => {
        return axios.post('users/accounts/link_instagram', {access_token: accessToken});
    },
    unlinkUserAccounts: (accountId) => {
        return axios.delete(`users/accounts/${accountId}`);
    },
    inviteFriend: (email) => {
        return axios.post('users/invite_friend', {email: email});
    },
    search: (q = '') => {
        return axios.get(`search?q=${q}`);
    },
    getNotificationsNumber: () => {
        return axios.get('users/notifications/not_read_notifications_number');
    },
    getNotifications: (data = ['skip', 'limit']) => {
        return axios.get('users/notifications',  {params: {
                skip: data['skip'],
                limit: data['limit'],
            }
        });
    },
    markNotificationAsRead: (notificationId) => {
        return axios.post(`users/notifications/${notificationId}/mark_as_read`);
    },
    getGalleryItem: (galleryItemId) => {
        return axios.get(`/gallery/${galleryItemId}`);
    },
    getPost: (postId) => {
        return axios.get(`/posts/${postId}`);
    },
}
