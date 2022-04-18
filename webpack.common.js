const path = require('path')
const {VueLoaderPlugin} = require('vue-loader')
const {WebpackManifestPlugin} = require('webpack-manifest-plugin')
const {CleanWebpackPlugin} = require('clean-webpack-plugin')
const CompressionPlugin = require('compression-webpack-plugin')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin

let watchOptions = {
    aggregateTimeout: 300,
    poll: 1000,
    ignored: ['node_modules'],
}

let rules = [
    {
        test: /\.txt$/,
        use: 'raw-loader',
    },
    {
        test: /\.vue$/,
        use: 'vue-loader',
    },
    {
        test: /\.m?js$/,
        exclude: /(node_modules)/,
        use: {
            loader: 'babel-loader',
            options: {
                presets: [
                    [
                        '@babel/preset-env',
                        {
                            'debug': true,
                            corejs: 3,
                            'useBuiltIns': 'entry',
                            'targets': {
                                'browsers': [
                                    'defaults',
                                ],
                            },
                        },
                    ],
                ],
                plugins: [
                    [
                        '@babel/transform-runtime',
                    ],
                ],
            },
        },
    },
    {
        test: /\.(sa|sc|c)ss$/,
        use: [
            'style-loader',
            {
                loader: MiniCssExtractPlugin.loader,
                options: {
                    esModule: false,
                },
            },
            'css-loader',
            'sass-loader'
        ],
    },
    {
        test: /\.(png|jpe?g|gif|svg)$/,
        type: 'asset/resource'
    },
    {
        test: /\.(woff|woff2|ttf|otf|eot)$/,
        use: [
            {
                loader: 'file-loader',
                options: {
                    outputPath: 'webfonts'
                }
            }
        ]
    },
]

let plugins = [
    new VueLoaderPlugin(),
    new WebpackManifestPlugin({
        filename: 'manifest.json'
    }),
    new MiniCssExtractPlugin({
        filename: '[name].[chunkhash].css',
        chunkFilename: '[id].[chunkhash].css',
        insert: function (linkTag) {
            var preloadLinkTag = document.createElement('link')
            preloadLinkTag.rel = 'preload'
            preloadLinkTag.as = 'style'
            preloadLinkTag.href = linkTag.href
            document.head.appendChild(preloadLinkTag)
            document.head.appendChild(linkTag)
        }
    }),
    new CleanWebpackPlugin(),
    new CompressionPlugin(),
    // new BundleAnalyzerPlugin(),
]

module.exports = {
    watchOptions: watchOptions,
    entry: {
        app: './resources/js/app.js',
    },
    output: {
        path: path.resolve(__dirname, 'public/dist'),
        publicPath: "/dist/",
        filename: '[name].[chunkhash].js',
        chunkFilename: '[id].[chunkhash].js',
        assetModuleFilename: 'images/[name][ext][query]'
    },
    resolve: {
        extensions: ['*', '.js', '.vue', '.json'],
        fallback: {crypto: false, stream: require.resolve("stream-browserify"), "buffer": require.resolve("buffer/")},
    },
    module: {
        rules: rules,
    },
    plugins: plugins,
}
