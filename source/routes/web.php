<?php

/**
 * Authentication
 */

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');

Route::get('logout', [
    'as' => 'auth.logout',
    'uses' => 'Auth\AuthController@getLogout'
]);

// Allow registration routes only if registration is enabled.
if (settings('reg_enabled')) {
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('register', 'Auth\AuthController@postRegister');
    Route::get('register/confirmation/{token}', [
        'as' => 'register.confirm-email',
        'uses' => 'Auth\AuthController@confirmEmail'
    ]);
}

// Register password reset routes only if it is enabled inside website settings.
if (settings('forgot_password')) {
    Route::get('password/remind', 'Auth\PasswordController@forgotPassword');
    Route::post('password/remind', 'Auth\PasswordController@sendPasswordReminder');
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');
}

/**
 * Two-Factor Authentication
 */
if (settings('2fa.enabled')) {
    Route::get('auth/two-factor-authentication', [
        'as' => 'auth.token',
        'uses' => 'Auth\AuthController@getToken'
    ]);

    Route::post('auth/two-factor-authentication', [
        'as' => 'auth.token.validate',
        'uses' => 'Auth\AuthController@postToken'
    ]);
}

/**
 * Social Login
 */
Route::get('auth/{provider}/login', [
    'as' => 'social.login',
    'uses' => 'Auth\SocialAuthController@redirectToProvider',
    'middleware' => 'social.login'
]);

Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

Route::get('auth/twitter/email', 'Auth\SocialAuthController@getTwitterEmail');
Route::post('auth/twitter/email', 'Auth\SocialAuthController@postTwitterEmail');

Route::group(['middleware' => 'auth'], function () {

    /**
     * Dashboard
     */

    Route::get('/', [
        'as' => 'dashboard',
        'uses' => 'DashboardController@index'
    ]);

    /**
     * User Profile
     */

    Route::get('profile', [
        'as' => 'profile',
        'uses' => 'ProfileController@index'
    ]);

    Route::get('profile/activity', [
        'as' => 'profile.activity',
        'uses' => 'ProfileController@activity'
    ]);

    Route::put('profile/details/update', [
        'as' => 'profile.update.details',
        'uses' => 'ProfileController@updateDetails'
    ]);

    Route::post('profile/avatar/update', [
        'as' => 'profile.update.avatar',
        'uses' => 'ProfileController@updateAvatar'
    ]);

    Route::post('profile/avatar/update/external', [
        'as' => 'profile.update.avatar-external',
        'uses' => 'ProfileController@updateAvatarExternal'
    ]);

    Route::put('profile/login-details/update', [
        'as' => 'profile.update.login-details',
        'uses' => 'ProfileController@updateLoginDetails'
    ]);

    Route::put('profile/social-networks/update', [
        'as' => 'profile.update.social-networks',
        'uses' => 'ProfileController@updateSocialNetworks'
    ]);

    Route::post('profile/two-factor/enable', [
        'as' => 'profile.two-factor.enable',
        'uses' => 'ProfileController@enableTwoFactorAuth'
    ]);

    Route::post('profile/two-factor/disable', [
        'as' => 'profile.two-factor.disable',
        'uses' => 'ProfileController@disableTwoFactorAuth'
    ]);

    Route::get('profile/sessions', [
        'as' => 'profile.sessions',
        'uses' => 'ProfileController@sessions'
    ]);

    Route::delete('profile/sessions/{session}/invalidate', [
        'as' => 'profile.sessions.invalidate',
        'uses' => 'ProfileController@invalidateSession'
    ]);

    /**
     * User Management
     */
    Route::get('user', [
        'as' => 'user.list',
        'uses' => 'UsersController@index'
    ]);

    Route::get('user/create', [
        'as' => 'user.create',
        'uses' => 'UsersController@create'
    ]);

    Route::post('user/create', [
        'as' => 'user.store',
        'uses' => 'UsersController@store'
    ]);

    Route::get('user/{user}/show', [
        'as' => 'user.show',
        'uses' => 'UsersController@view'
    ]);

    Route::get('user/{user}/edit', [
        'as' => 'user.edit',
        'uses' => 'UsersController@edit'
    ]);

    Route::put('user/{user}/update/details', [
        'as' => 'user.update.details',
        'uses' => 'UsersController@updateDetails'
    ]);

    Route::put('user/{user}/update/login-details', [
        'as' => 'user.update.login-details',
        'uses' => 'UsersController@updateLoginDetails'
    ]);

    Route::delete('user/{user}/delete', [
        'as' => 'user.delete',
        'uses' => 'UsersController@delete'
    ]);

    Route::post('user/{user}/update/avatar', [
        'as' => 'user.update.avatar',
        'uses' => 'UsersController@updateAvatar'
    ]);

    Route::post('user/{user}/update/avatar/external', [
        'as' => 'user.update.avatar.external',
        'uses' => 'UsersController@updateAvatarExternal'
    ]);

    Route::post('user/{user}/update/social-networks', [
        'as' => 'user.update.socials',
        'uses' => 'UsersController@updateSocialNetworks'
    ]);

    Route::get('user/{user}/sessions', [
        'as' => 'user.sessions',
        'uses' => 'UsersController@sessions'
    ]);

    Route::delete('user/{user}/sessions/{session}/invalidate', [
        'as' => 'user.sessions.invalidate',
        'uses' => 'UsersController@invalidateSession'
    ]);

    Route::post('user/{user}/two-factor/enable', [
        'as' => 'user.two-factor.enable',
        'uses' => 'UsersController@enableTwoFactorAuth'
    ]);

    Route::post('user/{user}/two-factor/disable', [
        'as' => 'user.two-factor.disable',
        'uses' => 'UsersController@disableTwoFactorAuth'
    ]);

    /**
     * Invest
     */

    Route::get('dau-tu/create', [
        'as' => 'invest.tao_moi',
        'uses' => 'InvestController@create'
    ]);
    Route::post('dau-tu/create', [
        'as' => 'invest.store',
        'uses' => 'InvestController@store'
    ]);

    Route::get('hop-dong/contract', [
        'as' => 'invest.hop_dong',
        'uses' => 'InvestController@contract'
    ]);
    Route::get('hoan-von/refund-invest', [
        'as' => 'invest.hoan_von',
        'uses' => 'InvestController@refundInvest'
    ]);

    Route::post('hoan-von/refund-invest', [
        'as' => 'invest.yeuCauHoanVon',
        'uses' => 'InvestController@submitRefundInvest'
    ]);


    /**
     * Roles & Permissions
     */

    Route::get('role', [
        'as' => 'role.index',
        'uses' => 'RolesController@index'
    ]);

    Route::get('role/create', [
        'as' => 'role.create',
        'uses' => 'RolesController@create'
    ]);

    Route::post('role/store', [
        'as' => 'role.store',
        'uses' => 'RolesController@store'
    ]);

    Route::get('role/{role}/edit', [
        'as' => 'role.edit',
        'uses' => 'RolesController@edit'
    ]);

    Route::put('role/{role}/update', [
        'as' => 'role.update',
        'uses' => 'RolesController@update'
    ]);

    Route::delete('role/{role}/delete', [
        'as' => 'role.delete',
        'uses' => 'RolesController@delete'
    ]);


    Route::post('permission/save', [
        'as' => 'permission.save',
        'uses' => 'PermissionsController@saveRolePermissions'
    ]);

    Route::resource('permission', 'PermissionsController');

    /**
     * Settings
     */

    Route::get('settings', [
        'as' => 'settings.general',
        'uses' => 'SettingsController@general',
        'middleware' => 'permission:settings.general'
    ]);

    Route::post('settings/general', [
        'as' => 'settings.general.update',
        'uses' => 'SettingsController@update',
        'middleware' => 'permission:settings.general'
    ]);

    Route::get('settings/auth', [
        'as' => 'settings.auth',
        'uses' => 'SettingsController@auth',
        'middleware' => 'permission:settings.auth'
    ]);

    Route::post('settings/auth', [
        'as' => 'settings.auth.update',
        'uses' => 'SettingsController@update',
        'middleware' => 'permission:settings.auth'
    ]);

// Only allow managing 2FA if AUTHY_KEY is defined inside .env file
    if (env('AUTHY_KEY')) {
        Route::post('settings/auth/2fa/enable', [
            'as' => 'settings.auth.2fa.enable',
            'uses' => 'SettingsController@enableTwoFactor',
            'middleware' => 'permission:settings.auth'
        ]);

        Route::post('settings/auth/2fa/disable', [
            'as' => 'settings.auth.2fa.disable',
            'uses' => 'SettingsController@disableTwoFactor',
            'middleware' => 'permission:settings.auth'
        ]);
    }

    Route::post('settings/auth/registration/captcha/enable', [
        'as' => 'settings.registration.captcha.enable',
        'uses' => 'SettingsController@enableCaptcha',
        'middleware' => 'permission:settings.auth'
    ]);

    Route::post('settings/auth/registration/captcha/disable', [
        'as' => 'settings.registration.captcha.disable',
        'uses' => 'SettingsController@disableCaptcha',
        'middleware' => 'permission:settings.auth'
    ]);

    Route::get('settings/notifications', [
        'as' => 'settings.notifications',
        'uses' => 'SettingsController@notifications',
        'middleware' => 'permission:settings.notifications'
    ]);

    Route::post('settings/notifications', [
        'as' => 'settings.notifications.update',
        'uses' => 'SettingsController@update',
        'middleware' => 'permission:settings.notifications'
    ]);

    /**
     * Activity Log
     */

    Route::get('activity', [
        'as' => 'activity.index',
        'uses' => 'ActivityController@index'
    ]);

    Route::get('activity/user/{user}/log', [
        'as' => 'activity.user',
        'uses' => 'ActivityController@userActivity'
    ]);

});


/**
 * Installation
 */

$router->get('install', [
    'as' => 'install.start',
    'uses' => 'InstallController@index'
]);

$router->get('install/requirements', [
    'as' => 'install.requirements',
    'uses' => 'InstallController@requirements'
]);

$router->get('install/permissions', [
    'as' => 'install.permissions',
    'uses' => 'InstallController@permissions'
]);

$router->get('install/database', [
    'as' => 'install.database',
    'uses' => 'InstallController@databaseInfo'
]);

$router->get('install/start-installation', [
    'as' => 'install.installation',
    'uses' => 'InstallController@installation'
]);

$router->post('install/start-installation', [
    'as' => 'install.installation',
    'uses' => 'InstallController@installation'
]);

$router->post('install/install-app', [
    'as' => 'install.install',
    'uses' => 'InstallController@install'
]);

$router->get('install/complete', [
    'as' => 'install.complete',
    'uses' => 'InstallController@complete'
]);

$router->get('install/error', [
    'as' => 'install.error',
    'uses' => 'InstallController@error'
]);
/**
 * News Management
 */
Route::get('tin-tuc', [
    'as' => 'news.danh-sach',
    'uses' => 'ManageNewsController@listTinTuc'
]);
/**
 * Interest Management
 */
Route::get('interest/hop-dong-dau-tu', [
    'as' => 'interest.list-hop-dong-dau-tu',
    'uses' => 'ManageInvestController@listHopDongDauTu'
]);
Route::get('interest/hop-dong-dau-tu/{idHD}/update', [
    'as' => 'interest.hop-dong-dau-tu.update',
    'uses' => 'ManageInvestController@updateHopDongDauTu'
]);
Route::delete('interest/hop-dong-dau-tu/{idHD}/delete', [
    'as' => 'interest.hop-dong-dau-tu.delete',
    'uses' => 'ManageInvestController@deleteHopDongDauTu'
]);
Route::get('interest/danh-sach-lai-bien-dong', [
    'as' => 'interest.lai_bien_dong.list',
    'uses' => 'ManageInvestController@listLaiBienDong'
]);
Route::get('interest/lai-bien-dong/create', [
    'as' => 'interest.lai_bien_dong.create',
    'uses' => 'ManageInvestController@createLaiBienDong'
]);
Route::post('interest/lai-bien-dong/add', [
    'as' => 'interest.lai_bien_dong.add',
    'uses' => 'ManageInvestController@addLaiBienDong'
]);
Route::get('interest/lai-bien-dong/{idLaiBD}/edit', [
    'as' => 'interest.lai_bien_dong.edit',
    'uses' => 'ManageInvestController@editLaiBienDong'
]);
Route::put('interest/lai-bien-dong/{idLaiBD}/update', [
    'as' => 'interest.lai_bien_dong.update',
    'uses' => 'ManageInvestController@updateLaiBienDong'
]);
Route::delete('interest/lai-bien-dong/{idLaiBD}/delete', [
    'as' => 'interest.lai_bien_dong.delete',
    'uses' => 'ManageInvestController@deleteLaiBienDong'
]);



Route::get('interest/danh-sach-goi-lai', [
    'as' => 'interest.goi_lai.list',
    'uses' => 'ManageInvestController@listGoiLai'
]);
Route::get('interest/goi-lai/create', [
    'as' => 'interest.goi_lai.create',
    'uses' => 'ManageInvestController@createGoiLai'
]);
Route::post('interest/goi-lai/add', [
    'as' => 'interest.goi_lai.add',
    'uses' => 'ManageInvestController@addGoiLai'
]);
Route::get('interest/goi-lai/{idGoiLai}/edit', [
    'as' => 'interest.goi_lai.edit',
    'uses' => 'ManageInvestController@editGoiLai'
]);
Route::put('interest/goi-lai/{idGoiLai}/update', [
    'as' => 'interest.goi_lai.update',
    'uses' => 'ManageInvestController@updateGoiLai'
]);
Route::delete('interest/goi-lai/{idGoiLai}/delete', [
    'as' => 'interest.goi_lai.delete',
    'uses' => 'ManageInvestController@deleteGoiLai'
]);

/**
 * Manage news
 */
Route::get('quan-ly-tin-tuc', [
    'as' => 'newsadmin.list',
    'uses' => 'ManageNewsController@listNews'
]);
Route::get('quan-ly-tin-tuc/create', [
    'as' => 'newsadmin.create',
    'uses' => 'ManageNewsController@createNews'
]);
Route::post('quan-ly-tin-tuc/add', [
    'as' => 'newsadmin.add',
    'uses' => 'ManageNewsController@addNews'
]);
Route::get('quan-ly-tin-tuc/{idNews}/edit', [
    'as' => 'newsadmin.edit',
    'uses' => 'ManageNewsController@editNews'
]);
Route::put('quan-ly-tin-tuc/{idNews}/update', [
    'as' => 'newsadmin.update',
    'uses' => 'ManageNewsController@updateNews'
]);
Route::delete('quan-ly-tin-tuc/{idNews}/delete', [
    'as' => 'newsadmin.delete',
    'uses' => 'ManageNewsController@deleteNews'
]);


Route::post('getInvestType', [
    'as' => 'investtype.getInvestType',
    'uses' => 'InvestTypeController@getInvestType'
]);
Route::post('getBienDong', [
    'as' => 'investtype.getBienDong',
    'uses' => 'InvestTypeController@getBienDong'
]);
